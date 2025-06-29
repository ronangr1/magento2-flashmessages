/**
 * Copyright © Ronangr1, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
define([
    'uiComponent',
    'ko',
    'underscore',
    'Ronangr1_FlashMessages/js/model/flash',
    'Ronangr1_FlashMessages/js/flash-manager'
], function (Component, ko, _, flash, flashMessage) {
    'use strict'

    return Component.extend({
        defaults: {
            template: 'Ronangr1_FlashMessages/flash-messages',
            settings: {},
            messageQueue: ko.observableArray([])
        },

        initialize: function () {
            this._super()
            let messageData = this.messagesData
            messageData = messageData.filter(function (el) {
                return el != null;
            });
            if (messageData && messageData) {
                this._setSettings(this.configData);
                flashMessage.initialize(messageData);
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
            this.settings = _.extend(this.settings, settings)

            return this
        },
    })
})
