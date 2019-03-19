import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import UserMenu from "./UserMenu";
import UserBookList from './UserBookList';
import Upload from './Upload';
import Profile from './Profile';
import EditBook from './EditBook';
import { BrowserRouter, Route} from 'react-router-dom';
export default class AppUser extends Component {
    render() {
        return (
            <BrowserRouter>
                <div className="row">
                    <UserMenu/>
                    <div className="col-md-9">
                        <Route path="/myaccount/dashboard" component={UserBookList} />
                        <Route path="/myaccount/downloads" component={UserBookList} />
                        <Route path="/myaccount/upload" component={Upload} />
                        <Route path="/myaccount/editbook/:id" component={EditBook} />
                        <Route path="/myaccount/profile" component={Profile} />
                    </div>
                </div>
            </BrowserRouter>
        );
    }
}

if (document.getElementById('AppUser')) {
    ReactDOM.render(<AppUser />, document.getElementById('AppUser'));
}
