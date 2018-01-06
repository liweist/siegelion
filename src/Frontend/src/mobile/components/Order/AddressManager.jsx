import React, { Component } from 'react';
import { connect } from 'react-redux'
import { bindActionCreators } from 'redux';
import * as actions from '../../../common/actions.jsx';
import {CellsTitle, Cells, Cell, CellHeader, CellBody, CellFooter, Toast} from 'react-weui';

class AddressManager extends Component {
    static defaultProps = {
        addresses: []
    }

    constructor(props) {
        super(props);
        this.state = {
            showToast: false,
            toastTimer: null
        }
    }

    showToast() {
        this.setState({showToast: true});
        this.state.toastTimer = setTimeout(()=> {
            this.setState({showToast: false});
            this.props.history.push('/order');
        }, 800);
    }

    componentDidMount() {
        this.props.getAddresses();
    }

    componentWillUnmount() {
        this.state.toastTimer && clearTimeout(this.state.toastTimer);
    }

    render() {
        return (
            <div>
                <div className="sl-page-header-title">选择物流地址</div>
                <Cells style={{marginBottom: '100px'}}>
                    {this.props.addresses.map((address, index) => {
                        return (
                            <Cell onClick={() => {
                                this.props.useAddress(address.addressid);
                                this.showToast();
                            }}>
                                <CellBody>
                                    <div>{address.name}&nbsp;&nbsp;&nbsp;&nbsp;{address.tel}</div>
                                    <div style={{fontSize: '14px', paddingTop: '5px'}}>{address.country}{address.province}{address.city}{address.detail}</div>
                                </CellBody>
                                <CellFooter>{index == 0 ? '默认' : ''}</CellFooter>
                            </Cell>
                        );
                    })}
                </Cells>
                <div className="sl-bottom-fixed">
                    <a className="sl-bottom-fixed-full-button" onClick={() => window.location.replace('/logistic')}>新增地址</a>
                </div>
                <Toast icon="success-no-circle" show={this.state.showToast}>已设置地址</Toast>
            </div>
        );
    }
}

const mapStateToProps = state => ({
    addresses: state.logisticService.addresses,
    response: state.logisticService.response
});

const mapDispatchToProps = (dispatch, ownProps) => bindActionCreators({
    getAddresses: actions.addresses,
    useAddress: actions.useAddress
}, dispatch);

export default connect(mapStateToProps, mapDispatchToProps)(AddressManager);