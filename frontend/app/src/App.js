import React, { Component } from 'react';
const axios = require('axios');
const url = 'http://localhost:8080';
class App extends Component {

  constructor(props){
    super(props);
    this.state = {
      timezone: '...'
    }
  }
  componentWillMount(){
    this.getTimeZone();
  }

  componentDidMount(){
    let result = this.postTimeZone(this.state.timezone);
    result===true?console.log('Timezone posted'):console.log('Error occured while posting.');
  }

  getTimeZone() { 
    this.setState({
      timezone: new Date().toString() 
    })
  }

  async postTimeZone(timezone) {

    let config = {
      method: 'get',
      url: 'http://localhost:8080/?datetime='+timezone,
      headers: {
        'Accept': 'application/json, text/plain, /'
      }
    };

    return await axios(config)
    .then(function (response) {
      console.info('response', response);
      return response;
    })
    .catch(function (error) {
      console.error('error', error);
      return false;
    });    
  }

  render() {
    return(
      <div>
      {this.state.timezone}
    </div>
    )
  }
}

export default App;

