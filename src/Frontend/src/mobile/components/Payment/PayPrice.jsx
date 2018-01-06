import React, { Component } from 'react';
import {CellsTitle, Cells, CellHeader, CellBody, Cell, CellFooter} from 'react-weui';

export default class PayPrice extends Component {
    render() {
        return (
            <div>
                <Cells>
                    <Cell>
                        <CellHeader>应付:</CellHeader>
                        <CellBody>
                            <span className="sl-settle-price-currency">￥</span>
                            <span className="sl-settle-price">{this.props.total}</span>
                        </CellBody>
                    </Cell>
                </Cells>
            </div>
        );
    }
}