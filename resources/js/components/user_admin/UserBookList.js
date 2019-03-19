import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import BookListItem from './BookListItem';
import axios from 'axios';
import Loading from '../Loading';
class UserBookList extends Component{
	constructor(props){
		super(props);
		this.state = {
			loading:true,
			books:[]
		}

		axios.post('/ajax/user/books').then( response => {
			this.setState({
				loading:false,
				books:response.data.books.data,
				resource:response.data.resource,
				nextPage:response.data.books.next_page_url
			});

		});

	}

	nextPage(url){
		this.setState(
			{
				loading:true
			}
		);
		axios.post(url).then( response => {
			this.setState({
				loading:false,
				books:response.data.books.data,
				nextPage:response.data.books.next_page_url
			});
		});
	}
	
	render(){
		if(this.state.loading){
			return <Loading title="Books are loading. Please wait...."/>
		}
		return(
				<div>
					{ this.state.books.map( book => {
						return(<BookListItem book={book} resource={this.state.resource}/>);
					}) }
					{ this.state.nextPage ? <div className="text-center"> <button type="button" onClick = { (ev) => this.nextPage(this.state.nextPage) } className="btn btn-info btn-lg">Next page</button> </div> : ''}
					
				</div>
			);
	}
}

export default UserBookList;