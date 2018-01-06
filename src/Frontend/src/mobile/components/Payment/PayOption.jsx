import React, { Component } from 'react';
import WeUI from 'react-weui';
const {CellsTitle, Cells, CellHeader, CellBody, Cell, CellFooter, Form, FormCell, Select} = WeUI;

export default class PayOption extends Component {
    render() {
        return (
            <div>
                <CellsTitle>付款方式</CellsTitle>
                <Form>
                    <FormCell select>
                        <CellBody>
                            <Select defaultValue="wxpay" onChange={(event) => this.props.gateway(event.target.value)}>
                                <option value="wxpay">微信支付</option>
                            </Select>
                        </CellBody>
                    </FormCell>
                </Form>
            </div>
        );
    }
}