import React, { Component } from 'react';
import { strToMoney } from '../../../common/utils/stringUtil.jsx';

export default class ProductCard extends Component {
    render() {
        let price = strToMoney(this.props.price);
        return (
            <div className="sl-card-item">
                <a href={`/product/${this.props.id}`}>
                    <figure className="sl-card-item-pic">
                        <img className="sl-card-item-pic-image" src={this.props.image}/>
                    </figure>
                    <figcaption className="sl-card-item-detail">
                        <div className="sl-card-item-title">{this.props.name}<span className="sl-card-item-subtitle">￥{price}</span></div>
                        <div className="sl-card-item-desc">{this.props.description}</div>
                    </figcaption>
                </a>
            </div>
        );
    }
}
