import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { Provider } from 'react-redux';
import FastClick from 'fastclick';
import { BrowserRouter, Route } from 'react-router-dom';
import createBrowserHistory from 'history/createBrowserHistory';

import 'weui';
import 'react-weui/lib/react-weui.min.css';
import './style/main.css';

import AppContainer from './components/AppContainer.jsx';
import CustomerContainer from './components/Customer/CustomerContainer.jsx';
import OpenOrdersContainer from './components/Orders/OpenOrdersContainer.jsx';
import PaidOrdersContainer from './components/Orders/PaidOrdersContainer.jsx';
import ClosedOrdersContainer from './components/Orders/ClosedOrdersContainer.jsx';
import OrderDetail from './components/Orders/OrderDetail.jsx';
import LogisticDetail from './components/Orders/LogisticDetail.jsx';
import AddressManagerContainer from './components/Address/AddressManagerContainer.jsx';
import AddressSetDefaultContainer from './components/Address/AddressSetDefaultContainer.jsx';
import AddAddressContainer from './components/Address/AddAddressContainer.jsx';
import UpdateAddressContainer from './components/Address/UpdateAddressContainer.jsx';

import store from '../common/store.jsx';

ReactDOM.render((
    <Provider store={store}>
        <BrowserRouter>
            <AppContainer>
                <Route exact path="/" component={CustomerContainer}/>
                <Route exact path="/orders/open" component={OpenOrdersContainer}/>
                <Route exact path="/orders/paid" component={PaidOrdersContainer}/>
                <Route exact path="/orders/closed" component={ClosedOrdersContainer}/>
                <Route exact path="/order/:id" component={OrderDetail}/>
                <Route exact path="/logistic/:id" component={LogisticDetail}/>
                <Route exact path="/address/add" component={AddAddressContainer}/>
                <Route exact path="/address/update" component={AddressManagerContainer}/>
                <Route exact path="/address/update/:id" component={UpdateAddressContainer}/>
                <Route exact path="/address/setdefault" component={AddressSetDefaultContainer}/>
            </AppContainer>
        </BrowserRouter>
    </Provider>
), document.getElementById('root'));

FastClick.attach(document.body);