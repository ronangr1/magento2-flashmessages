/**
 * Copyright © Ronangr1, All rights reserved.
 * See LICENSE for license details.
 */
define([
    'ko',
    'underscore',
    'Ronangr1_FlashMessages/js/model/flash'
], function (ko, _, flash) {
    'use strict'

    return {
        initialize: function (messages) {
            if (messages && messages.length) {
                this.addMessages(messages)
            }

            return this
        },

        addMessage: function (message) {
            flash.set(message)

            return this
        },

        addMessages: function (messages) {
            flash.set(messages)

            return this
        },

        clearMessages: function () {
            _.each(flash.get(), function (message) {
                flash.delete(message)
            })

            return this
        },

        enqueueMessage: function (message) {
            this.addMessage(message)

            return this
        }
    }
})
