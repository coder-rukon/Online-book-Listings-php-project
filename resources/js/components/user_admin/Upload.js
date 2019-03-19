import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import Loading from '../Loading';
import Alert from '../Alert';
const BASE_URL = "http://127.0.0.1:8000/";

class Upload extends Component{
	constructor(props){
		super(props);
		this.isLoading = false;

		this.state = {
			userId:1,
			isLoading:true,
			hideform:false,
			name:'',
			author:'',
			category:'',
			description:'',
			location:'',
			contact_details:'',
			type:'',
			edition:'',
			file_url:'',
			language:'',
			up_date:'',
			thumbnail:'',
			errorMessage:'',
			isError:false,
			bookCategory:[],
			locations:[]
		}
		axios.get(BASE_URL+"api/category").then(response => {
			this.isLoading = false;
			this.setState({
				isLoading:false,
				bookCategory:response.data
			});
		}).catch(error => {
			console.log(error);
		});
		axios.get(BASE_URL+"api/location").then(response => {
			this.isLoading = false;
			this.setState({
				isLoading:false,
				locations:response.data
			});
		}).catch(error => {
			console.log(error);
		});
	}
	loadCategory(){

	}
	onChangeHandler(event) {
		if(event.target.value.length <=0){
			this.setState({
				isError:true,
				errorMessage: "The Field "+ [event.target.name] + " is required.",
				[event.target.name] : event.target.value
			});
		}else{
			this.setState({
				isError:false,
				[event.target.name] : event.target.value
			});
		}
		
	}
	uploadHandler(event){
		event.preventDefault();
		this.setState({
            isLoading:true
        });
		let formData = new FormData(document.getElementById("formUpload"))
		axios.post('/ajax/bookUpload/',formData).then(response => {
			this.setState({
				message:"Thank you to submit. Book uploaded and is now under review. We will review it as soon possible.",
                hideform:true,
                isLoading:false
			})
		}).catch(function(error){
            this.setState({
				message:error,
                hideform:true,
                isLoading:false
			})
        });;

	}
	errorCheck(){
		if(this.state.isError){
			return(
				<div className="alert alert-danger">
					<h2>{this.state.errorMessage}</h2>
				</div>
			);
		}else{
			return "";
		}
		
	}
	render(){
		if(this.state.hideform){
			return(
				<Alert title= {this.state.message}/>
			);
		}
		return(
			<div className="userBookUpload">
					{ this.errorCheck() }
					<form onSubmit={ this.uploadHandler.bind(this) } id="formUpload" action="/myaccount/upload">
						<div className="form-group">
							<label>Book Name</label>
							<input type="text" name="name"  className="form-control"/>
						</div>
						<div className="form-group">
							<label>Author</label>
							<input type="text" name="author"  className="form-control"/>
						</div>
						<div className="form-group">
							<label>Edition</label>
							<input type="text" name="edition"  className="form-control"/>
						</div>
						<div className="form-group">
							<label>File type</label>
							<select name="type"  className="form-control">
								<option value='soft_copy'>Soft Copy</option>
								<option value="hard_copy">Hard Copy</option>
							</select>
						</div>
						<div className="form-group">
							<label>Book Cover Image/Thumbnail</label>
							<input type="file" name="thumbnail" className="form-control"/>
						</div>
						<div className="form-group">
							<label>Select Book</label>
							<input type="file" name="book_file" className="form-control"/>
						</div>
						<div className="form-group">
							<label>Contact Details</label>
							<textarea name="contact_details"  rows="10" className="form-control"></textarea>
						</div>

						<div className="form-group">
							<label>Category</label>
							<select name="book_category[]" multiple  className="form-control">
								{ this.state.bookCategory.map( category => {
									return(
											<option value={category.id}>{category.name}</option>
										)
								} ) }
								
							</select>
						</div>
						<div className="form-group">
							<label>Location</label>
							<select name="location" className="form-control">
								{ this.state.locations.map( loc => {
									return(
											<option value={loc.id}>{loc.name}</option>
										)
								} ) }
								
							</select>
						</div>

						<div className="form-group">
							<label>Description</label>
							<textarea name="description"  rows="10" className="form-control"></textarea>
						</div>
						
						{ (this.state.isLoading ? <Loading title="Book updating.."/> : <button type="submit" className="btn btn-default btn-success mb-3">Update Book</button>) }
					</form> 
			</div>
		);
		
		
	}

}
export default Upload;