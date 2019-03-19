import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { Link} from 'react-router-dom';
export default class UserMenu extends Component{
	render(){
		return(
			<div className="col-md-3">
                <div className="user_admin_menu">
                    <ul>
                        <li>
                            <Link to='/myaccount/dashboard'><i className="fa fa-book"></i>My Books</Link>
                        </li>
                        <li>
                            <Link to='/myaccount/upload'><i className="fa fa-upload"></i>Upload Book</Link>
                        </li>
                        {/*
                        <li>
                            <Link to='/myaccount/downloads'><i className="fa fa-upload"></i>Downloads</Link>
                        </li>
                        */}
                        <li>
                            <Link to='/myaccount/profile'><i className="fa fa-user"></i>Profile</Link>
                        </li>
                    </ul>
                </div>
            </div>
		)
	}
}