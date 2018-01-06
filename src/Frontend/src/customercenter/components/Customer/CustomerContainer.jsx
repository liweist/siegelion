import React, { Component } from 'react';
import { connect } from 'react-redux'
import { bindActionCreators } from 'redux';
import * as actions from '../../../common/actions.jsx';
import {
    Footer, FooterLink, FooterLinks, FooterText, Cell, 
    Cells, CellsTitle, CellHeader, CellBody, CellFooter
} from 'react-weui';

import BasicInfoCell from './BasicInfoCell.jsx';
import AddressMangerCell from './AddressManagerCell.jsx';
import MyOrderCells from './MyOrderCells.jsx';
import MemberCardCells from './MemberCardCells.jsx';
import ServicesCells from './ServicesCells.jsx';

import '../../style/customer.css';

class CustomerContainer extends Component {
    componentDidMount() {
        this.props.getCustomer();
    }

    render() {
        return (
            <div className="sl-page">
                <div className="sl-customer-header-title">个人中心</div>
                <CellsTitle>基本信息</CellsTitle>
                <BasicInfoCell wxname={this.props.wxname} avatarurl={this.props.avatarurl}/>
                <CellsTitle>全部订单</CellsTitle>
                <MyOrderCells 
                    openOrders={() => this.props.history.push('/orders/open')}
                    paidOrders={() => this.props.history.push('/orders/paid')}
                    closedOrders={() => this.props.history.push('/orders/closed')}
                />
                <CellsTitle>物流地址管理</CellsTitle>
                <AddressMangerCell 
                    updateAddress={() => this.props.history.push('/address/update')}
                    setDefault={() => this.props.history.push('/address/setdefault')}
                />
                <CellsTitle>其他服务</CellsTitle>
                <ServicesCells/>
                <div className="sl-footer">
                    <Footer>
                        <FooterLinks>
                            <FooterLink href="//m.couqiao.me">首页</FooterLink>
                            <FooterLink href="//c.couqiao.me">会员中心</FooterLink>
                            <FooterLink href="//m.couqiao.me/help">常见问题</FooterLink>
                        </FooterLinks>
                        <FooterText>&copy; 2017 安徽萨乌森信息科技有限公司</FooterText>
                        <FooterText>皖ICP备17006047号</FooterText>
                    </Footer>
                </div>
            </div>
        );
    }
}

const mapStateToProps = state => ({
    customer: state.customerService.customer,
    wxname: state.customerService.wxname,
    avatarurl: state.customerService.avatarurl
});

const mapDispatchToProps = (dispatch, ownProps) => bindActionCreators({
    getCustomer: actions.customer
}, dispatch);

export default connect(mapStateToProps, mapDispatchToProps)(CustomerContainer);