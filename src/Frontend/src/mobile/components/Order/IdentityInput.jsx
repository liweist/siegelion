import React, { Component } from 'react';
import WeUI from 'react-weui';
const {CellsTitle, Form, FormCell, CellHeader, CellBody, CellFooter, Cell, Label, Input, Icon} = WeUI;

export default class IdentityInput extends Component {
    render() {
        return (
            <div style={this.props.needIdentity ? {display: 'block'} : {display: 'none'}}>
                <CellsTitle>因海关清关需要，请填写收货人的真实姓名与身份证号</CellsTitle>
                <Form>
                    <FormCell warn={!this.props.validateName}>
                        <CellHeader>
                            <Label>真实姓名</Label>
                        </CellHeader>
                        <CellBody>
                            <Input type="text" placeholder="请正确填写真实姓名" onChange={(e) => {
                                this.props.onIdentityNameChange(e.target.value);
                            }}/>
                        </CellBody>
                        <CellFooter>
                            <Icon value="warn" style={this.props.validateName ? {display: 'none'} : {display: 'block'}}/>
                        </CellFooter>
                    </FormCell>
                    <FormCell warn={!this.props.validateNationalId}>
                        <CellHeader>
                            <Label>身份证号</Label>
                        </CellHeader>
                        <CellBody>
                            <Input type="text" placeholder="请正确填写身份证号" onChange={(e) => {
                                this.props.onIdentityNationalIdChange(e.target.value);
                            }}/>
                        </CellBody>
                        <CellFooter>
                            <Icon value="warn" style={this.props.validateNationalId ? {display: 'none'} : {display: 'block'}}/>
                        </CellFooter>
                    </FormCell>
                </Form>
            </div>
        );
    }
}