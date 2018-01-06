import React, { Component } from 'react';

export default class NumberPanel extends Component {
    static propTypes = {
        name: React.PropTypes.string.isRequired,
        initialQuantity: React.PropTypes.number.isRequired,
        getQuantity: React.PropTypes.func.isRequired
    }

    constructor(props) {
        super(props);
        this.handleChange = this.handleChange.bind(this);
        this.reduce = this.reduce.bind(this);
        this.increase = this.increase.bind(this);

        this.state = {
            quantity: this.props.initialQuantity
        }
    }

    handleChange(event) {
        this.setState({quantity: event.target.value});
    }

    reduce() {
        if (this.state.quantity > 1) {
            this.setState({
                quantity: this.state.quantity - 1
            });
            this.props.getQuantity(this.state.quantity - 1);
        }
    }

    increase() {
        this.setState({
            quantity: this.state.quantity + 1
        });
        this.props.getQuantity(this.state.quantity + 1);
    }

    componentDidUpdate(prevProps, prevState) {
        if (prevProps !== this.props.initialQuantity && prevState == this.state) {
            this.setState({quantity: this.props.initialQuantity});
        }
    }

    render() {
        return (
            <div className="sl-number-panel">
                <div className="sl-number-panel-container">
                    <button onClick={this.reduce} className="sl-number-panel-reduce">-</button>
                    <input className="sl-number-panel-input" type="tel" min="1" value={this.state.quantity} onChange={this.handleChange} name={this.props.name} disabled/>
                    <button onClick={this.increase} className="sl-number-panel-increase">+</button>
                </div>
            </div>
        );
    }
}