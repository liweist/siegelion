import React, { Component } from 'react';

import ProductCard from './ProductCard.jsx';

export default class ProductList extends Component {
    render() {
        return (
            <div className="sl-card-list">
                {this.props.products.map((product) => (
                    <ProductCard
                        id={product.productid}
                        name={product.name}
                        description={product.description}
                        price={product.sellprice}
                        image={product.picurl.titlepic}
                    />
                ))}
            </div>
        );
    }
}