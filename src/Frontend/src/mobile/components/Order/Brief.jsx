import React, { Component } from 'react';
import WeUI from 'react-weui';
const {CellsTitle, Cells} = WeUI;

import BriefItem from './BriefItem.jsx';

export default class Brief extends Component {
    static defaultProps = {
        items: []
    }

    render() {
        return (
            <div>
                <CellsTitle>商品概要</CellsTitle>
                <Cells>
                    {this.props.items.map((item) => {
                        return (
                            <BriefItem item={item}/>
                        );
                    })}
                </Cells>
            </div>
        );
    }
}