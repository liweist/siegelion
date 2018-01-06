import React, { Component } from 'react';
import { connect } from 'react-redux'
import { bindActionCreators } from 'redux';
import * as actions from '../../../common/actions.jsx';
import {Dialog} from 'react-weui';

import AddressInfo from './AddressInfo.jsx';
import Brief from './Brief.jsx';
import TotalPrice from './TotalPrice.jsx';
import OrderButton from './OrderButton.jsx';
import IdentityInput from './IdentityInput.jsx';

class OrderContainer extends Component {
    static defaultProps = {
        totalprice: 0,
        discount: 0,
        addressAndFee: {
            currentAddress: [],
            logisticFee: 0
        }
    }
    
    constructor(props) {
        super(props);
        this.state = {
            name: '',
            nationalId: '',
            validNationalId: true,
            validName: true,
            validAddress: true
        }
    }

    onIdentityNameChange(name) {
        this.setState({name: name})
    }

    onIdentityNationalIdChange(nationalId) {
        this.setState({nationalId: nationalId})
    }

    identityValidate() {
        let valid = true;
        this.state.name == '' ? this.setState({validName: valid = false}) : this.setState({validName: true});
        this.state.nationalId == '' ? this.setState({validNationalId: valid = false}) : this.setState({validNationalId: true});
        return valid;
    }

    addressValidate() {
        if (this.props.addressAndFee.currentAddress.length == 0) {
            this.setState({validAddress: false});
            return false;
        }
        this.setState({validAddress: true});
        return true;
    }

    componentDidMount() {
        this.props.getCartitems();
        this.props.getCurrentAddress();
    }

    render() {
        return (
            <div className="sl-page">
                <div className="sl-page-header-title">订单概览</div>
                <div style={{paddingBottom: '100px'}}>
                    <AddressInfo 
                        valid={this.state.validAddress} 
                        address={this.props.addressAndFee.currentAddress} 
                        onAddressClick={() => this.props.history.push('/address')}
                    />
                    <IdentityInput 
                        needIdentity={this.props.hasCustoms} 
                        onIdentityNameChange={(name) => this.onIdentityNameChange(name)}
                        onIdentityNationalIdChange={(nationalId) => this.onIdentityNationalIdChange(nationalId)}
                        validateName={this.state.validName}
                        validateNationalId={this.state.validNationalId}
                    />
                    <Brief items={this.props.cartitems}/>
                    <TotalPrice 
                        total={this.props.totalprice} 
                        discount={this.props.discount} 
                        logisticfee={this.props.addressAndFee.logisticFee}
                    />
                </div>
                <OrderButton 
                    total={
                        parseInt(this.props.totalprice) 
                        + parseInt(this.props.addressAndFee.logisticFee) 
                        - parseInt(this.props.discount)
                    }
                    order={() => {
                        if (this.addressValidate()) {
                            if (this.props.hasCustoms) {
                                if (this.identityValidate()) {
                                    this.props.setCustomsInfo(this.state.name, this.state.nationalId)
                                    this.props.history.push('/payment');
                                }
                            } else {
                                this.props.history.push('/payment');
                            }
                        }
                    }}
                />
            </div>
        );
    }
}

const mapStateToProps = state => ({
    cartitems: state.cartService.cartitems,
    totalprice: state.cartService.totalprice,
    hasCustoms: state.cartService.hascustomsitem,
    addressAndFee: state.logisticService.addressAndFee,
    discount: 0
});

const mapDispatchToProps = (dispatch, ownProps) => bindActionCreators({
    getCartitems: actions.cartitems,
    getCurrentAddress: actions.currentAddress,
    setCustomsInfo: actions.customs
}, dispatch);

export default connect(mapStateToProps, mapDispatchToProps)(OrderContainer);