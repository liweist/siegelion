import React, { Component } from 'react';
import { connect } from 'react-redux'
import { bindActionCreators } from 'redux';
import * as actions from '../../../common/actions.jsx';
import {Flex, FlexItem, Dialog, Toast} from 'react-weui';

import Address from './Address.jsx';
import MobilePhone from './MobilePhone.jsx';

class UpdateAddressContainer extends Component {
    static defaultProps = {
        address: {
            tel: '',
            name: '',
            province: '',
            area: '',
            city: '',
            detail: ''
        }
    }

    constructor(props) {
        super(props);
        this.state = {
            country: '中国',
            province: '',
            city: '',
            area: '',
            name: '',
            detail: '',
            tel: '',
            validName: true,
            validLocation: true,
            validDetail: true,
            validTel: true,
            loadingTimer: null
        };
    }

    onAddressChange(name, city, detail) {
        let location = city.split(' ');
        this.setState({
            name: name,
            province: location[0],
            city: location[1],
            area: location[2],
            detail: detail
        });
    }

    onMobileChange(tel) {
        this.setState({
            tel: tel
        });
    }

    validate() {
        let valid = true;
        this.state.name == '' ? this.setState({validName: valid = false}) : this.setState({validName: true});
        this.state.province == undefined ? this.setState({validLocation: valid = false}) : this.setState({validLocation: true});
        this.state.detail == '' ? this.setState({validDetail: valid = false}) : this.setState({validDetail: true});
        this.state.tel == '' ? this.setState({validTel: valid = false}) : this.setState({validTel: true});
        return valid;
    }


    showLoading() {
        this.setState({showLoading: true});
        this.state.loadingTimer = setTimeout(()=> {
            this.setState({showLoading: false});
        }, 800);
    }

    componentDidMount() {
        this.props.getAddress(this.props.match.params.id);
    }

    componentWillUnmount() {  
        this.state.loadingTimer && clearTimeout(this.state.loadingTimer);
    }

    componentWillReceiveProps(nextProps) {
        this.setState({
            province: nextProps.address.province,
            city: nextProps.address.city,
            area: nextProps.address.area,
            name: nextProps.address.name,
            detail: nextProps.address.detail,
            tel: nextProps.address.tel
        });
    }

    render() {
        return (
            <div>
                <Flex>
                    <FlexItem>
                        <div style={{backgroundColor: '#f5f5f5', fontSize: '25px', padding: '15px'}}>修改物流地址</div>
                    </FlexItem>
                </Flex>
                <Flex style={{paddingBottom: '100px'}}>
                    <FlexItem>
                        <Address 
                            initalName={this.props.address.name}
                            initalCity={this.props.address.province + ' ' + this.props.address.city + ' ' + this.props.address.area}
                            initalDetail={this.props.address.detail}
                            onAddressChange={(name, city, detail) => this.onAddressChange(name, city, detail)}
                            validateName={this.state.validName}
                            validateLocation={this.state.validLocation}
                            validateDetail={this.state.validDetail}
                        />
                        <MobilePhone 
                            initalTel={this.props.address.tel}
                            onMobileChange={(tel) => this.onMobileChange(tel)}
                            validate={this.state.validTel}
                        />
                    </FlexItem>
                </Flex>
                <Flex>
                    <FlexItem>
                        <div className="sl-bottom-fixed">
                            <a className="sl-bottom-fixed-full-button" onClick={() => {
                                if (this.validate()) {
                                    this.showLoading();
                                    this.props.updateAddress(
                                        this.props.match.params.id, 
                                        {
                                            location: {
                                                country: this.state.country,
                                                province: this.state.province,
                                                city: this.state.city,
                                                area: this.state.area,
                                                detail: this.state.detail
                                            },
                                            name: this.state.name,
                                            tel: this.state.tel
                                        }
                                    );
                                }
                            }}>保存修改</a>
                        </div>
                    </FlexItem>
                </Flex>
                <Toast icon="success-no-circle" show={this.state.showLoading}>已保存</Toast>
            </div>
        );
    }
}

const mapStateToProps = state => ({
    address: state.logisticService.address
});

const mapDispatchToProps = (dispatch, ownProps) => bindActionCreators({
    getAddress: actions.address,
    updateAddress: actions.updateAddress
}, dispatch);

export default connect(mapStateToProps, mapDispatchToProps)(UpdateAddressContainer);