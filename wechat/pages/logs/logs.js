//logs.js
const util = require('../../utils/util.js')

Page({
  data: {
    logs: []
  },
  onLoad: function () {
    wx.getStorage({
      key: 'openid',
      success: function (res) {
        console.log(res.data.data)
      }
    })
  }
})
