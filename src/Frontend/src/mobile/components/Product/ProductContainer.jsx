import React, { Component } from 'react';
import { connect } from 'react-redux'
import { bindActionCreators } from 'redux';
import * as actions from '../../../common/actions.jsx';
import { Toast } from 'react-weui';

import ProductDescription from './ProductDescription.jsx';
import PurchaseQuantity from './PurchaseQuantity.jsx';
import PurchaseOption from './PurchaseOption.jsx';
import ProductDetails from './ProductDetails.jsx';
import AddToCartButton from './AddToCartButton.jsx';

import '../../style/product.css';

class ProductContainer extends Component {
    static defaultProps = {
        product: {
            id: '',
            picurl: {
                titlepic: '',
                detailpics: []
            },
            description: '',
            name: '',
            sellprice: 0,
            skus: []
        }
    }
    
    constructor(props) {
        super(props);
        this.state = {
            quantity: 1,
            showToast: false,
            toastTimer: null,
            sku: undefined
        }
    }

    showToast() {
        this.setState({showToast: true});
        this.state.toastTimer = setTimeout(()=> {
            this.setState({showToast: false});
        }, 2000);
    }

    handlePurchaseOptionChange(option) {
        this.setState({sku: option});
    }

    componentDidMount() {
        this.props.getProduct(this.props.match.params.id);
    }

    componentWillUnmount() {
        this.state.toastTimer && clearTimeout(this.state.toastTimer);
    }

    render() {
        return (
            <div className="sl-page" style={{backgroundColor: '#fff'}}>
                <img className="sl-responsive-img" src={this.props.product.picurl.titlepic}/>  
                <ProductDescription 
                    name={this.props.product.name} 
                    description={this.props.product.description}
                    price={this.props.product.sellprice}
                />
                <PurchaseOption 
                    skus={this.props.product.skus} 
                    handleOnChange={(option) => this.handlePurchaseOptionChange(option)}
                />
                <PurchaseQuantity 
                    getQuantity={(quantity) => {
                        this.setState({quantity: quantity});
                    }}
                />
                <hr className="sl-content-hr"/>
                <ProductDetails detailpics={this.props.product.picurl.detailpics}/>
                <AddToCartButton 
                    cartitemCount={this.props.cartitemCount} 
                    addCartitem={() => {
                        let sku = this.state.sku == undefined ? this.props.product.skus[0] : this.state.sku;
                        this.props.addCartitem(this.props.product.productid, this.state.quantity, sku.id);
                        this.showToast();
                    }}
                />
                <Toast icon="success-no-circle" show={this.state.showToast}>已加入购物车</Toast>
            </div>
        );
    }
}

const mapStateToProps = state => ({
    product: state.productService.product,
    cartitemCount: state.cartService.cartitemCount 
                   ? state.cartService.cartitemCount
                   : state.productService.cartitemCount
});

const mapDispatchToProps = (dispatch, ownProps) => bindActionCreators({
    getProduct: actions.product,
    addCartitem: actions.addCartitem
}, dispatch);

export default connect(mapStateToProps, mapDispatchToProps)(ProductContainer);