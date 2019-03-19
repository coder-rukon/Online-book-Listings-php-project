import React, { Component } from 'react';
import { Link} from 'react-router-dom';
import Loading from "../Loading";
import Alert from "../Alert";
import axios from 'axios';
const BOOK_URL = "/book";
const AJAX_BASE = "/ajax/";
class BookListItem extends Component{
	constructor(props){
		super(props);
		this.state = {
			loading: false,
			id: this.props.book.id,
			name: this.props.book.name,
			thumbnail: this.props.book.thumbnail,
			status: this.props.book.status,
			author: this.props.book.author,
			edition: this.props.book.edition,
			category: this.props.book.category,
		};
	}
	Edit(event) {
		event.preventDefault();
		this.setState({
			loading:true
		})
		alert("Edit");
	}
	Delete(event) {
		event.preventDefault();
		if(!confirm("Do you want to delete ?"))
			return;
		this.setState({
			loading:true
		})
		let url =  AJAX_BASE+'deleteBook';
		axios.post(url,{id: this.state.id}).then( response =>{
			this.setState({
				message: response.data.message,
				loading:false,
			});

		} ).catch(function (error) {
			console.log(error);
		});
		
		
	}
	statusText(){
		if(this.state.status == 'pending'){
			return (<a href="#" className="text-danger"><i className="fas fa-cloud-upload-alt "></i> Status: <span className="icon_text">Pending</span></a>);
		}else{
			return (<a href="#" className="text-success"><i className="fas fa-check-square"></i> Status: <span className="icon_text">Published</span></a>);
		}
	}
	render(){

		if(this.state.loading){
			return <Loading title={"Please Wait.."}/>
		}
		if(this.state.message){
			return <Alert title={ this.state.message }/>
		}

		return(
			<div className="emply-resume-list row mb-3">
			    <div className="col-md-9 emply-info">
			        <div className="emply-img">
			            <img src={ this.props.resource + '/'+ this.state.thumbnail } alt="" className=""/>
			        </div>
			        <div className="emply-resume-info">
			            <h4><a href="#">{this.state.name}</a></h4>
			            <p><i className="fas fa-user"></i> Author Name: <span>{this.state.author}</span></p>
			            <p><i className="fas fa-edit"></i> Edition: <span>{this.state.edition}</span></p>
			            <ul className="links_bottom_emp mt-3">
			                <li>
			                   { this.statusText() } 
			                </li>
			            </ul>
			        </div>
			        <div className="clearfix"></div>
			    </div>
			    <div className="col-md-3 emp_btn text-right" style={ {margin:0} }>
					<a className="btn btn-default btn-block" href={ BOOK_URL + '/' + this.props.book.id} target="_blank">Details</a>
					<Link to={ '/myaccount/editbook/'+ this.state.id } className="btn btn-default btn-block">Edit</Link>
					<a className="btn btn-default btn-block"  onClick = {this.Delete.bind(this)}>Delete </a>
			    </div>
			</div>
			)
	}
}

export default BookListItem;