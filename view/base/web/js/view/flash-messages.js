define([
    'uiComponent',
    'ko',
    'jquery'
], function (Component, ko) {
    'use strict'

    return Component.extend({
        defaults: {
            template: 'Ronangr1_FlashMessages/flash-messages',
            messages: ko.observableArray([]),
            settings: {},
        },

        initialize: function () {
            this._super()
            return this
        },

        initObservable: function () {
            this._super()
            if (typeof this.flash !== 'undefined') {
                this.setSettings(this.configData)
                this.setMessages(this.flash)
            }
            return this
        },

        setMessages: function (message) {
            message.visible = ko.observable(true);
            this.messages.push(message)
            if (this.settings.delay && this.settings.autoHide !== false) {
                setTimeout(function () {
                    this.removeMessage(message)
                }.bind(this), this.settings.delay);
            }
        },

        setSettings: function (settings) {
            this.settings = settings
        },

        removeMessage: function (message) {
            message.visible(false);
            setTimeout(function () {
                this.messages.remove(message);
            }.bind(this), 500)
        }
    })
})
