import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import FastClick from 'fastclick';
import { BrowserRouter, Route } from 'react-router-dom';
import { applyMiddleware, createStore, combineReducers } from 'redux';
import { Provider } from 'react-redux';

import 'weui';
import 'react-weui/lib/react-weui.min.css';
import './style/main.css';

import AppContainer from './components/AppContainer.jsx';
import HomeContainer from './components/Home/HomeContainer.jsx';
import ProductContainer from './components/Product/ProductContainer.jsx';
import CartContainer from './components/Cart/CartContainer.jsx';
import LogisticContainer from './components/Logistic/LogisticContainer.jsx';
import OrderContainer from './components/Order/OrderContainer.jsx';
import AddressManager from './components/Order/AddressManager.jsx';
import PaymentContainer from './components/Payment/PaymentContainer.jsx';
import PaySuccess from './components/Payment/PaySuccess.jsx';
import PayFail from './components/Payment/PayFail.jsx';
import PayCancel from './components/Payment/PayCancel.jsx';
import PageNotFound from './components/Common/PageNotFound.jsx';

import store from '../common/store.jsx';

ReactDOM.render((
    <Provider store={store}>
        <BrowserRouter>
            <AppContainer>
                <Route exact path="/" component={HomeContainer}/>
                <Route path="/home" component={HomeContainer}/>
                <Route exact path="/product/" component={PageNotFound}/>
                <Route exact path="/product/:id" component={ProductContainer}/>
                <Route path="/cart" component={CartContainer}/>
                <Route path="/logistic" component={LogisticContainer}/>
                <Route path="/order" component={OrderContainer}/>
                <Route path="/address" component={AddressManager}/>
                <Route path="/payment" component={PaymentContainer}/>
                <Route path="/paysuccess" component={PaySuccess}/>
                <Route path="/payfail" component={PayFail}/>
                <Route path="/paycancel" component={PayCancel}/>
            </AppContainer>
        </BrowserRouter>
    </Provider>
), document.getElementById('root'));

FastClick.attach(document.body);