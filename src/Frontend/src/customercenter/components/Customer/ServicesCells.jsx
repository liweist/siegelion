import React, { Component } from 'react';
import WeUI from 'react-weui';
const {
    Cell, Cells, CellsTitle, CellHeader, CellBody, CellFooter, Badge
} = WeUI;

export default class ServicesCells extends Component {
    render() {
        return (
            <Cells>
                <Cell access>
                    <CellBody>联系客服</CellBody>
                    <CellFooter></CellFooter>
                </Cell>
                <Cell access>
                    <CellBody>物流政策</CellBody>
                    <CellFooter></CellFooter>
                </Cell>
                <Cell access>
                    <CellBody>用户使用条款</CellBody>
                    <CellFooter></CellFooter>
                </Cell>
                <Cell access>
                    <CellBody>吐槽与建议</CellBody>
                    <CellFooter></CellFooter>
                </Cell>
            </Cells>
        );
    }
}