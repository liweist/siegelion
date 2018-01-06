import React, { Component } from 'react';

export default class RadioBoxes extends Component {
    static propTypes = {
        name: React.PropTypes.string.isRequired,
        boxes: React.PropTypes.array.isRequired,
        defaultCheckedIndex: React.PropTypes.number.isRequired,
        handleOnChange: React.PropTypes.func.isRequired
    }

    static defaultProps = {
        boxes: [],
        name: 'radioBox',
        defaultCheckedIndex: 0
    }

    constructor(props) {
        super(props);
        this.state = {
            chooseIndex: props.defaultCheckedIndex,
            chooseValue: props.boxes.length > 0 ? props.boxes[0] : {}
        }
    }

    render() {
        return (
            <div className="sl-radio-boxes">
                {this.props.boxes.map((box, index) => {
                    return (
                        <div className="sl-radio-box-container" key={box.id}>
                            <input 
                                className="sl-radio-box-input" 
                                type="radio" name={this.props.name} 
                                defaultChecked={index == this.props.defaultCheckedIndex ? true : false}
                                onChange={() => {
                                    this.setState({chooseIndex: index, chooseValue: box});
                                    this.props.handleOnChange(box);
                                }}
                            />
                            <div className="sl-radio-box-content">{box.value}</div>
                        </div>
                    );
                })}
            </div>
        );
    }
}
