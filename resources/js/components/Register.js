import React,{Component} from 'react';
import ReactDOM from 'react-dom';
export default class Register extends Component{
	constructor(props){
		super(props);
        this.state = {
            error:false,
            message:null,
            loading:false,
        };
	}
	doRegister(event){
		event.preventDefault();
        let data = {
            email:document.getElementById('reg_email').value,
            password:document.getElementById('reg_pass').value,
            password_confirmation:document.getElementById('reg_pass_con').value,
            name:document.getElementById('reg_full_name').value,
        }
        this.setState({
            loading:true
        });
        var that = this;
        $.post("/registerAjax", data, function(res) {
            let resObj = JSON.parse(res);
           that.setState({
            loading:false,
            message:resObj.message
           })
           if(resObj.resultType){
                document.location.reload(true);
           }
        });

       
	}
	render(){
        if(this.state.loading){
            return(
                <div className="login px-4 mx-auto mw-100">
                    <h5 className="text-center mb-4">Loading Please Wait...</h5>
                </div>
                )
        }else{
           return(
                <div className="login px-4 mx-auto mw-100">
                    <h5 className="text-center mb-4">Register Now</h5>
                    { (this.state.message) ? <h3 className="alert aler-default alert-danger">{this.state.message}</h3> : "" }
                    <form onSubmit={this.doRegister.bind(this)}>
                        <div className="form-group">
                            <label>Full Name</label>
                            <input type="text" id="reg_full_name" className="form-control" placeholder="" required=""/>
                        </div>
                        <div className="form-group">
                            <label>Email Address</label>
                            <input type="email"  id="reg_email" className="form-control" placeholder="" required=""/>
                        </div>
                        <div className="form-group">
                            <label className="mb-2">Password</label>
                            <input type="password" id="reg_pass"  className="form-control" placeholder="" required=""/>
                        </div>
                        <div className="form-group">
                            <label>Confirm Password</label>
                            <input type="password" id="reg_pass_con"  className="form-control" placeholder="" required=""/>
                        </div>

                        <button type="submit" className="btn btn-primary submit mb-4">Register</button>
                        <p className="text-center pb-4">
                            <a href="/terms">By clicking Register, I agree to your terms</a>
                        </p>
                    </form>

                </div>
            ); 
        }
		
	}
}


if (document.getElementById('user_register_component')) {
    ReactDOM.render(<Register />, document.getElementById('user_register_component'));
}
