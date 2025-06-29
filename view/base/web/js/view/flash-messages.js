/**
 * Copyright © Ronangr1, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
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

            if (typeof this.messagesData !== 'undefined' && this.messagesData) {
                this._setSettings(this.configData)
                flash.set(this.messagesData)
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
