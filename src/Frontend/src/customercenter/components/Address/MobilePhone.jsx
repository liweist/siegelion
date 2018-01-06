import React, { Component } from 'react';
import WeUI from 'react-weui';
const {CellsTitle, Form, FormCell, CellHeader, CellBody, CellFooter, Cell, Select, Input, Icon} = WeUI;

export default class MobilePhone extends Component {
    constructor(props) {
        super(props);
        this.state = {
            prefix: '+86',
            phone: ''
        }
    }

    render() {
        return (
            <div>
                <CellsTitle>手机号码</CellsTitle>
                <Form>
                    <FormCell select selectPos="before" warn={!this.props.validate}>
                        <CellHeader>
                            <Select 
                                value={this.state.prefix == '' ? (this.props.initalTel.split(')')[0]).substr(1) : this.state.prefix} 
                                onChange={(e) => {
                                    this.setState({prefix: e.target.value});
                                    this.props.onMobileChange('('+ e.target.value + ')' + this.state.phone);
                                }}>
                                <option value="+86">+86</option>
                                <option value="+852">+852</option>
                                <option value="+853">+853</option>
                                <option value="+886">+886</option>
                            </Select>
                        </CellHeader>
                        <CellBody>
                            <Input 
                                type="tel" 
                                placeholder="手机号码" 
                                    onChange={(e) => {
                                    this.setState({phone: e.target.value});
                                    this.props.onMobileChange('('+ this.state.prefix + ')' + e.target.value);
                                }} 
                                value={this.state.phone == '' ? this.props.initalTel.split(')')[1] : this.state.phone}
                            />
                        </CellBody>
                        <CellFooter>
                            <Icon value="warn" style={this.props.validate ? {display: 'none'} : {display: 'block'}}/>
                        </CellFooter>
                    </FormCell>
                </Form>
            </div>
        );
    }
}