import React, { Component } from 'react';
import { connect } from 'react-redux'
import { bindActionCreators } from 'redux';
import * as actions from '../../../common/actions.jsx';

import { LoadMore, Flex, FlexItem, Dialog } from 'react-weui';

import CartList from './CartList.jsx';
import SettleButton from './SettleButton.jsx';
import PopupUpdate from './PopupUpdate.jsx';

import '../../style/cart.css';

class CartContainer extends Component {
    constructor(props) {
        super(props);
        this.state = {
            popupState: false,
            selectedItem: {
                product: {
                    picurl: {
                        titlepic: ''
                    },
                    name: '',
                    sellprice: 0,
                    skus: []
                },
                cartitemid: 1,
                quantity: 1,
                sku: 0
            },
            selectedItemQuantity: 1,
            showConfirmRemoveItemDialog: false
        };
    }
    
    hidePopup() {
        this.setState({
            popupState: false
        });
    }

    showPopup(item) {
        this.setState({
            popupState: true,
            selectedItem: item,
            selectedItemQuantity: item.quantity
        });
    }

    handleQuantityChange(quantity) {
        this.setState({
            selectedItemQuantity: quantity
        });
    }

    handlePopupRightOnClick() {
        this.props.updateCartitem(
            this.state.selectedItem.cartitemid, 
            this.state.selectedItemQuantity
        );
    }

    componentDidMount() {
        this.props.getCartitems();
    }

    render() {
        return (
            <div>
                <Flex>
                    <FlexItem>
                        <div style={{'backgroundColor': '#f5f5f5', 'font-size': '25px', 'padding': '15px'}}>购物车</div>
                    </FlexItem>
                </Flex>
                <Flex style={{'marginTop': '-20px', 'paddingBottom': '100px', 'backgroundColor': '#f5f5f5'}}>
                    <FlexItem>
                        <CartList 
                            items={this.props.cartitems} 
                            itemClick={(item) => this.showPopup(item)}
                        /> 
                    </FlexItem>
                </Flex>
                <Flex>
                    <FlexItem>
                        <SettleButton totalprice={this.props.totalprice} next={() => {
                            if (this.props.totalprice > 0) {
                                this.props.history.push('/order');
                            }
                        }}/>
                    </FlexItem>
                </Flex>
                <PopupUpdate 
                    popupState={this.state.popupState} 
                    hide={() => this.hidePopup()} 
                    item={this.state.selectedItem} 
                    handleQuantityChange={(quantity) => this.handleQuantityChange(quantity)} 
                    handleRightOnClick={() => this.handlePopupRightOnClick()}
                    removeCartitem={() => {
                        this.setState({showConfirmRemoveItemDialog: true});
                        this.hidePopup();
                    }}
                />
                <Dialog
                    buttons={[
                        {
                            type: 'default',
                            label: '取消',
                            onClick: () => this.setState({showConfirmRemoveItemDialog: false})
                        },
                        {
                            type: 'primary',
                            label: '确认移除',
                            onClick: () => {
                                this.props.removeCartitem(this.state.selectedItem.cartitemid);
                                this.setState({showConfirmRemoveItemDialog: false});
                            }
                        }
                    ]} 
                    show={this.state.showConfirmRemoveItemDialog}
                >
                    您确认要从购物车中移除该项目吗？
                </Dialog>
            </div>
        );
    }
}

const mapStateToProps = state => ({
    cartitems: state.cartitemService.cartitems 
               ? state.cartitemService.cartitems 
               : state.cartService.cartitems,
    totalprice: state.cartitemService.totalprice 
                ? state.cartitemService.totalprice 
                : state.cartService.totalprice
});

const mapDispatchToProps = (dispatch, ownProps) => bindActionCreators({
    getCartitems: actions.cartitems,
    updateCartitem: actions.updateCartitem,
    removeCartitem: actions.removeCartitem
}, dispatch);

export default connect(mapStateToProps, mapDispatchToProps)(CartContainer);