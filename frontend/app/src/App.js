import React, { Component } from 'react';
const axios = require('axios');
const url = '';
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
    let result = this.postTimeZone(this.timezone);
    result===true?console.log('Timezone posted'):console.log('Error occured while posting.');
  }

  getTimeZone() {
    const date = new Date();
    const dateAsString = date.toString();
    const timezone = dateAsString.match(/\(([^)]+)\)$/)[1];
    
    this.setState({
      timezone: timezone
    }) 
  }

  async postTimeZone(timezone) {
    let config = {
      method: 'post',
      crossorigin:true,
      url: url,
      data: {
        timezone: timezone
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