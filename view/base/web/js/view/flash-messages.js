define([
    'uiComponent',
    'ko',
    'underscore',
    'Ronangr1_FlashMessages/js/model/flash'
], function (Component, ko, _, flash) {
    'use strict'

    return Component.extend({
        defaults: {
            template: 'Ronangr1_FlashMessages/flash-messages',
            settings: {},
        },

        initialize: function () {
            this._super()

            const messages = this.messagesData,
                configData = this.configData

            if (typeof messages !== 'undefined' && messages) {
                this._setSettings(configData)
                flash.set(messages)
            }

            return this
        },

        getMessages: function () {
            const messages = flash.get(),
                self = this

            if (this.settings.delay && this.settings.autoHide !== false) {
                setTimeout(function () {
                    _.each(messages, function (message) {
                        self.hideAndDelete(message)
                    })
                }.bind(this), this.settings.delay)
            }

            return messages
        },

        hideAndDelete: function (message) {
            return flash.delete(message)
        },

        _setSettings: function (settings) {
            this.settings = settings

            return this
        },
    })
})
