import React, { Component } from 'react';

class Alert extends Component {
    render() {
        return (
            <div>
                <div className={ this.props.type ? 'alert alert-'+this.props.type : 'alert alert-success'} role="alert">
                    <strong>{ this.props.title }</strong>
                    <button type="button" className="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        );
    }
}

export default Alert;