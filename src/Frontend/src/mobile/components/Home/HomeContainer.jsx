import React, { Component } from 'react';
import { connect } from 'react-redux'
import { bindActionCreators } from 'redux';
import * as actions from '../../../common/actions.jsx';
import { Footer, FooterLink, FooterLinks, FooterText } from 'react-weui';

import Activity from './Activity.jsx';
import ProductList from './ProductList.jsx';

import '../../style/home.css';

class HomeContainer extends Component {
    static defaultProps = {
        products: []
    }

    componentDidMount() {
        this.props.getProducts();
    }

    render() {
        return (
            <div className="sl-page">
                <Activity/>
                <ProductList products={this.props.products}/>
                <div className="sl-footer">
                    <Footer>
                        <FooterLinks>
                            <FooterLink href="/">首页</FooterLink>
                            <FooterLink href="//c.couqiao.me">会员中心</FooterLink>
                            <FooterLink href="/help">常见问题</FooterLink>
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
    products: state.productsService.products
});

const mapDispatchToProps = (dispatch, ownProps) => bindActionCreators({
    getProducts: actions.products
}, dispatch);

export default connect(mapStateToProps, mapDispatchToProps)(HomeContainer);