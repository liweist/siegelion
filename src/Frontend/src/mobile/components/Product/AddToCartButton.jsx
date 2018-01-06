import React, { Component } from 'react';

import WeUI from 'react-weui';
const {Badge} = WeUI;

export default class AddToCartButton extends Component {
    static propTypes = {
        cartTotalNumber: React.PropTypes.number.isRequired,
        addCartitem: React.PropTypes.func.isRequired,
        cartitemCount: React.PropTypes.number.isRequired
    }
    
    render() {
        return (
            <div className="sl-bottom-fixed">
                <a className="sl-bottom-fixed-subbutton" href="//m.couqiao.me">
                    <div className="sl-bottom-fixed-subbutton-container">
                        <img className="sl-bottom-fixed-subbutton-image" src="//static.couqiao.me/image/common/home.png"/>
                    </div>
                </a>
                <a className="sl-bottom-fixed-subbutton" href="//c.couqiao.me">
                    <div className="sl-bottom-fixed-subbutton-container">
                        <img className="sl-bottom-fixed-subbutton-image" src="//static.couqiao.me/image/common/user.png"/>
                    </div>
                </a>
                <a className="sl-bottom-fixed-subbutton" href="//m.couqiao.me/cart">
                    <div className="sl-bottom-fixed-subbutton-container">
                        <img className="sl-bottom-fixed-subbutton-image" src="//static.couqiao.me/image/common/cart.png"/>
                        <Badge 
                            id="sl-cart-totalnumber" 
                            preset="header" 
                            style={this.props.cartitemCount > 0 ? {display: 'block'} : {display: 'none'}}
                        >{this.props.cartitemCount}</Badge>
                    </div>
                </a>
                <a className="sl-bottom-fixed-button" onClick={this.props.addCartitem}>加入购物车</a>
            </div>
        );
    }
}