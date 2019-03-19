import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import Loading from '../Loading';
import Alert from '../Alert';
const BASE_URL = "http://127.0.0.1:8000/";

class EditBook extends Component{
	constructor(props){
		super(props);
		this.isLoading = false;

		this.state = {
			id:this.props.match.params.id,
			hideform:false,
			userId:0,
			isLoading:true,
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
			categoryBook:[],
			locations:[]
        }
        axios.post(BASE_URL+'/api/getBook/',{id:this.state.id}).then(response => {
            this.state.categoryBook = response.data.category;
            this.setState(response.data.book);
        }).catch(function(error){
            console.log(error);
        });
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
        let formData = new FormData(document.getElementById("formUpload"));
        this.setState({
            isLoading:true
        });
        
		axios.post(BASE_URL+'/ajax/bookUpdate/',formData).then(response => {
			this.setState({
				message:"Book Updated",
                hideform:true,
                isLoading:false
			})
		}).catch(function(error){
            this.setState({
				message:error,
                hideform:true,
                isLoading:false
			})
        });
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
                            <input type="hidden" name="id" value={this.props.match.params.id}  className="form-control"/>
                        </div>
                        <div className="form-group">
                            <label>Book Name</label>
                            <input type="text"  onChange={this.onChangeHandler.bind(this)} name="name" value={this.state.name}  className="form-control"/>
                        </div>
                        <div className="form-group">
                            <label>Author</label>
                            <input type="text"  onChange={this.onChangeHandler.bind(this)} name="author" value={this.state.author}  className="form-control"/>
                        </div>
                        <div className="form-group">
                            <label>Edition</label>
                            <input type="text"  onChange={this.onChangeHandler.bind(this)} name="edition" value={this.state.edition}  className="form-control"/>
                        </div>
                        <div className="form-group">
                            <label>File type</label>
                            <select name="type"  onChange={this.onChangeHandler.bind(this)}  className="form-control">
                                <option select= { (this.state.type  == 'soft_copy' ? 'selected' : '') } value='soft_copy'>Soft Copy</option>
                                <option select= { (this.state.type  == 'hard_copy' ? 'selected' : '') }  value="hard_copy">Hard Copy</option>
                            </select>
                        </div>
                        <div className="form-group">
                            <label>Book Cover Image/Thumbnail</label>
                            <input type="file" name="thumbnail" className="form-control"/>
                        </div>
                        <div className="form-group">
                            <label>Select Book</label>
                            <input type="file" name="book_file"  className="form-control"/>
                        </div>
                        <div className="form-group">
                            <label>Contact Details</label>
                            <textarea name="contact_details"  onChange={this.onChangeHandler.bind(this)}  rows="10" className="form-control"  value={this.state.contact_details} />
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
                            <textarea name="description" onChange={this.onChangeHandler.bind(this)}  rows="10" className="form-control" value={this.state.description}  />
                        </div>
                        
                        { (this.state.isLoading ? <Loading title="Book updating.."/> : <button type="submit" className="btn btn-default btn-success mb-3">Submit Book</button>) }
                    </form> 
            </div>
        );
	}
		
	

}
export default EditBook;