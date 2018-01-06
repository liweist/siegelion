import React, { Component } from 'react';
import {
    Cell, Cells, CellsTitle, CellHeader, CellBody, CellFooter
} from 'react-weui';

export default class AddressManagerCell extends Component {
    render() {
        return (
            <Cells>
                <Cell access onClick={this.props.updateAddress}>
                    <CellBody>
                        地址修改与新增
                    </CellBody>
                    <CellFooter></CellFooter>
                </Cell>
                <Cell access onClick={this.props.setDefault}>
                    <CellBody>
                        默认地址设置
                    </CellBody>
                    <CellFooter></CellFooter>
                </Cell>
            </Cells>
        );
    }
}
