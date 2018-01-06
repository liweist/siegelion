import React, { Component } from 'react';
import WeUI from 'react-weui';
const {CellsTitle, Form, FormCell, CellHeader, CellBody, Cell, 
    CellFooter, Input, Label, CityPicker, Select, Icon} = WeUI;

import citydata from '../../../../data/city.js';

export default class Address extends Component {
    constructor(props) {
        super(props);
        this.state = {
            popupState: false,
            city: '',
            name: '',
            detail: ''
        };
    }

    handleOnCityChange(city) {
        this.setState({
            city: city == '' ? '北京 北京市 东城区' : city,
            popupState: false
        });
        this.props.onAddressChange(this.state.name, city, this.state.detail);
    }

    handleOnNameChange(e) {
        this.setState({
            name: e.target.value
        });
        this.props.onAddressChange(e.target.value, this.state.city, this.state.detail);
    }

    handleOnDetailChange(e) {
        this.setState({
            detail: e.target.value
        });
        this.props.onAddressChange(this.state.name, this.state.city, e.target.value);
    }

    showPopup(e) {
        e.preventDefault();
        this.setState({
            popupState: true
        });
    }

    hidePopup(){
        this.setState({
            popupState: false
        });
    }

    render() {
        return (
            <div>
                <CellsTitle>寄送地址</CellsTitle>
                <Form>
                    <FormCell warn={!this.props.validateName}>
                        <CellHeader>
                            <Label>收件人</Label>
                        </CellHeader>
                        <CellBody>
                            <Input 
                                type="text" 
                                placeholder="真实姓名" 
                                value={this.state.name == '' ? this.props.initalName : this.state.name} 
                                onChange={(e) => this.handleOnNameChange(e)}
                            />
                        </CellBody>
                        <CellFooter>
                            <Icon value="warn" style={this.props.validateName ? {display: 'none'} : {display: 'block'}}/>
                        </CellFooter>
                    </FormCell>
                    <FormCell warn={!this.props.validateLocation}>
                        <CellHeader>
                            <Label>省市区县</Label>
                        </CellHeader>
                        <CellBody>
                            <Input 
                                type="text"
                                onClick={(e) => this.showPopup(e)}
                                placeholder="选择省市区县"
                                readOnly={true}
                                value={this.state.city == '' ? this.props.initalCity : this.state.city}
                            />
                        </CellBody>
                        <CellFooter>
                            <Icon value="warn" style={this.props.validateLocation ? {display: 'none'} : {display: 'block'}}/>
                        </CellFooter>
                    </FormCell>
                    <FormCell warn={!this.props.validateDetail}>
                        <CellHeader>
                            <Label>详细地址</Label>
                        </CellHeader>
                        <CellBody>
                            <Input 
                                type="text" 
                                placeholder="街道名房屋号" 
                                value={this.state.detail == '' ? this.props.initalDetail : this.state.detail} 
                                onChange={(e) => this.handleOnDetailChange(e)}
                            />
                        </CellBody>
                        <CellFooter>
                            <Icon value="warn" style={this.props.validateDetail ? {display: 'none'} : {display: 'block'}}/>
                        </CellFooter>
                    </FormCell>
                </Form>
                <CityPicker
                    data={citydata}
                    onCancel={() => this.hidePopup()}
                    onChange={(city) => this.handleOnCityChange(city)}
                    show={this.state.popupState}
                />
            </div>
        );
    }
}