import React, { Component } from 'react';
import ReactDOM from 'react-dom';
export default class Login extends Component {
    constructor(props){
        super(props);
        this.state = {
            loading:false,
            isError:false,
            isSubmited:false,
            loginSucces:false,
            message:null
        }
    }
    login(event){
        event.preventDefault();
        this.setState({
            loading:true,
            isSubmited:true
        })
        let data = {
            email: document.getElementById("userEmail").value,
            password: document.getElementById("userPassword").value,
        }
        var that = this;
        $.post("http://127.0.0.1:8000/loginAjax", data, function(res) {
           
           let resObj = JSON.parse(res);
           that.setState({
            loading:false,
            loginSucces:true,
            message:resObj.message
           })
           if(resObj.resultType){
            document.location.reload(true);
           }
        });
    };
    render() {
        if(this.state.loading){
            return(
                <div className="modal-dialog modal-dialog-centered">
                    <div className="modal-content">
                        <div className="modal-header text-center">
                            <button type="button" className="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div className="modal-body">

                            <div className="login px-4 mx-auto mw-100">
                                <h5 className="text-center mb-4">Loging.. Please Wait..</h5>
                            </div>
                        </div>

                    </div>
                </div>
                );
        }else{
          return (
                <div className="modal-dialog modal-dialog-centered">
                    <div className="modal-content">
                        <div className="modal-header text-center">
                            <button type="button" className="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div className="modal-body">
                            
                            <div className="login px-4 mx-auto mw-100">
                                <h5 className="text-center mb-4">Login Now</h5>
                                {(this.state.message ? <h3>{this.state.message}</h3>:"")}
                                <form onSubmit={this.login.bind(this)} >
                                    <div className="form-group">
                                        <label className="mb-2">Email address</label>
                                        <input type="email" className="form-control" id="userEmail" aria-describedby="emailHelp" placeholder="" required=""/>
                                    </div>
                                    <div className="form-group">
                                        <label className="mb-2">Password</label>
                                        <input type="password" className="form-control" id="userPassword" placeholder="" required=""/>
                                    </div>
                                    <button type="submit" className="btn btn-primary submit mb-4">Sign In</button>
                                    <p className="text-center pb-4">
                                        <a href="#" data-toggle="modal" data-target="#exampleModalCenter2"> Don't have an account?</a>
                                    </p>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            );  
        }
        
    }
}

if (document.getElementById('LoginModel')) {
    ReactDOM.render(<Login />, document.getElementById('LoginModel'));
}
