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
        },

        initialize: function () {
            this._super()

            this._setSettings(this.configData);

            let messageData = this.messagesData
            messageData = messageData.filter(function (el) {
                return el != null;
            });

            if (typeof messageData !== "undefined" && messageData.length) {
                flashMessage.initialize(messageData);
            }

            return this
        },

        getMessages: function () {
            const messages = flash.get()

            if (this.settings.delay && this.settings.autoHide !== false) {
                setTimeout(function () {
                    flashMessage.clearMessages()
                }.bind(this), this.settings.delay)
            }

            return messages
        },

        hideAndDelete: function (message) {
            flashMessage.clearMessages()

            return this
        },

        _setSettings: function (settings) {
            this.settings = _.extend(this.settings, settings)

            return this
        },
    })
})
