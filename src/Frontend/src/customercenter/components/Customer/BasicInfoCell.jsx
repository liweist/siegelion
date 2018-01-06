import React, { Component } from 'react';
import {
    Cell, Cells, CellsTitle, CellHeader, CellBody, CellFooter
} from 'react-weui';

export default class BasicInfoCell extends Component {
    render() {
        return (
            <Cells>
                <Cell>
                    <CellHeader style={{position: 'relative', marginRight: '10px'}}>
                        <img src={this.props.avatarurl} style={{width: '50px', display: 'block'}} />
                    </CellHeader>
                    <CellBody>
                        <p>{this.props.wxname}</p>
                        <p style={{fontSize: '13px', color: '#888888'}}>普通会员</p>
                    </CellBody>
                    <CellFooter></CellFooter>
                </Cell>
            </Cells>
        );
    }
}
