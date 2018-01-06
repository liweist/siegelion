import React, { Component } from 'react';
import { connect } from 'react-redux'
import { bindActionCreators } from 'redux';
import * as actions from '../../../common/actions.jsx';
import {CellsTitle, Cells, Cell, CellHeader, CellBody, CellFooter} from 'react-weui';

class AddressManagerContainer extends Component {
    static defaultProps = {
        addresses: []
    }

    componentDidMount() {
        this.props.getAddresses();
    }

    render() {
        return (
            <div>
                <div className="sl-page-header-title">物流地址修改</div>
                <Cells style={{marginBottom: '100px'}}>
                    {this.props.addresses.map((address, index) => {
                        return (
                            <Cell onClick={() => {
                                this.props.history.push(`/address/update/${address.addressid}`);
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
                    <a className="sl-bottom-fixed-full-button" onClick={() => window.location.replace('/address/add')}>新增地址</a>
                </div>
            </div>
        );
    }
}

const mapStateToProps = state => ({
    addresses: state.logisticService.addresses
});

const mapDispatchToProps = (dispatch, ownProps) => bindActionCreators({
    getAddresses: actions.addresses,
}, dispatch);

export default connect(mapStateToProps, mapDispatchToProps)(AddressManagerContainer);