import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import Loading from '../Loading';
import Alert from '../Alert';
class Profile extends Component{

	constructor(props){
		super(props);
		this.action = "/ajax/user/update";
		this.state = {
			loading:true,
			type:'success',
		}
		axios.get('/ajax/getUser/').then(response => {
			let data = response.data;
			data.loading = false;
			this.setState(data);
		}).catch(function (error) {
			console.log(error);
		});
	}
	onSubmit(event){
		event.preventDefault();
		let password = document.getElementById('password').value;
		let con_password = document.getElementById('con_password').value;
		let email = document.getElementById("email").value;
		if(email.length <=0)
		{
			this.setState({
				message:"Email Field Required!",
				type: 'danger'
			});
			return;	
		}

		if(password.length >=1 && password != con_password){
			this.setState({
				message:"Password and Confirm password is not maching",
				type: 'danger'
			});
			return;
		}



		let formData = new FormData(document.getElementById('profileForm'));

		this.setState({
			loading:true
		})
		axios.post(this.action,formData).then(response => {
			let data = response.data;
			data.loading = false;
			data.message = "Profile Updated";
			this.setState(data);
		})
	}
	onChangeInput(event){
		
		this.setState({
			[event.target.name]:event.target.value
		});
		
	}
	onPasswordCnage(event){
		
	}
	render(){
		 
		if(this.state.loading){
			return(
				<Loading/>
			);
		}
		return(
				<div className="profile_user">
					{ this.state.message ? <Alert title={this.state.message} type={this.state.type}/> : "" }
					<form id="profileForm" action={this.action} method="post" className="row" onSubmit={this.onSubmit.bind(this)}>
						<div className="col-xs-12 col-sm-8">
							<div className="form-group">
								<label className="mb-2">Name</label>
								<input type="text" onChange={this.onChangeInput.bind(this)} name="name" value={this.state.name} className="form-control" />
							</div>
							<div className="form-group">
								<label className="mb-2">Email</label>
								<input type="text" id="email" name="email" onChange={this.onChangeInput.bind(this)} value={this.state.email} className="form-control" />
							</div>
							<div className="form-group">
								<label className="mb-2">Phone</label>
								<input type="text" onChange={this.onChangeInput.bind(this)} name="phone" value={this.state.phone} className="form-control" />
							</div>
							<div className="form-group">
								<label className="mb-2">Facebook</label>
								<input type="text" onChange={this.onChangeInput.bind(this)} name="facebook" value={this.state.facebook} className="form-control" />
							</div>
							<div className="form-group">
								<label className="mb-2">Twitter</label>
								<input type="text" onChange={this.onChangeInput.bind(this)} name="twitter" value={this.state.twitter} className="form-control" />
							</div>
							<div className="form-group">
								<label className="mb-2">Google Plus</label>
								<input type="text" onChange={this.onChangeInput.bind(this)} name="google" value={this.state.google} className="form-control" />
							</div>
							
							<div className="form-group">
								<label className="mb-2">Password</label>
								<input type="password" id="password" onChange={this.onPasswordCnage.bind(this)}   name="password" placeholder="**********************" className="form-control" />
							</div>
							<div className="form-group">
								<label className="mb-2">Retype password</label>
								<input type="password" id="con_password" onChange={this.onPasswordCnage.bind(this)}  name="re_password" placeholder="**********************" className="form-control" />
							</div>
							<div className="form-group">
								<label className="mb-2">Address</label>
								<textarea type="text" onChange={this.onChangeInput.bind(this)} name="address" className="form-control" value={this.state.address} />
							</div>
						</div>
						<div className="col-xs-12 col-sm-4">
							<div className="form-group">
								<img src={this.state.picture} className="thumbnail"  alt={this.state.name}/>
								<br/>
								<br/>
								<input type='file' name="profilePicture" className="form-control" />
							</div>
							<div className="form-group">
								<button type="submit" className="btn btn-success btn-lg">Save</button>
							</div>
						</div>
						
						
					</form>
				</div>
			);
	}

}
export default Profile;