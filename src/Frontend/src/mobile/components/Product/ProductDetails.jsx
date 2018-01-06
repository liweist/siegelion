import React, { Component } from 'react';

export default class ProductDetails extends Component {
    render() {
        return (
            <div className="sl-product-details">
                {this.props.detailpics.map((detailpic) => {
                    return (
                        <img className="sl-responsive-img" src={detailpic}/>
                    );
                })}
            </div>
        );
    }
}