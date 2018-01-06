import React, { Component } from 'react';
import {CellsTitle, Cells, Cell, CellHeader, CellBody, CellFooter, Icon} from 'react-weui';

export default class AddressInfo extends Component {
    static defaultProps = {
        address: {
            name: '',
            detail: ''
        }
    }

    render() {
        return (
            <div>
                <CellsTitle>物流地址</CellsTitle>
                <Cells>
                    <Cell access onClick={this.props.onAddressClick}>
                        <CellBody>
                            <div style={this.props.valid ? {color: '#000'} : {color: 'red'}}>{this.props.address.length == 0 ? '添加地址' : this.props.address.name}&nbsp;&nbsp;&nbsp;&nbsp;{this.props.address.tel}</div>
                            <div style={{fontSize: '14px', paddingTop: '5px'}}>{this.props.address.country}{this.props.address.province}{this.props.address.city}{this.props.address.detail}</div>
                        </CellBody>
                        <CellFooter>
                            <Icon value="warn" style={this.props.valid ? {display: 'none'} : {display: 'block'}}/>
                        </CellFooter>
                    </Cell>
                </Cells>
            </div>
        );
    }
}