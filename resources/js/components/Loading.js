import React, { Component } from 'react';
class Loading extends Component {
    render() {
        return (
            <div>
                <div className="alert alert-success text-center" role="alert">
                    <div className="spinner-border text-success" role="status">
                        <span className="sr-only">Loading...</span>
                    </div>
                    <br/>
                    <h4 className="alert-heading">{ (this.props.title ? this.props.title: "Loading..") }</h4>
                </div>
                
            </div>
        );
    }
}

export default Loading;