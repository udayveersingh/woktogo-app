@extends('common.index')

@section('content')
<div class="max-w-xs bg-transparent mx-auto px-5 py-10 mt-28">
    <div class="text-center mb-8">
        <p class="text-xl text-black font-bold">Voer Pincode In.</p>
    </div>

    <form id="otp-form">
        <div class="flex items-center justify-center gap-3 mb-6">
            @for ($i = 0; $i
            < 4; $i++)
                <input id="otp-container" onfocus="addOverlay()" onblur="removeOverlay()"
                type="text"
                maxlength="1"
                class="w-14 h-16 text-center text-2xl font-bold text-gray-900 bg-gray-100 border border-gray-200 rounded-md focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 outline-none" />
            @endfor
        </div>
        <button type="submit" class="w-full bg-indigo-500 hover:bg-indigo-600 text-white font-medium py-2.5 rounded-lg transition duration-150">
            Submit
        </button>
    </form>

    <div class="text-center text-sm text-gray-500 mt-4">
        <a href="#0" class="font-medium text-indigo-500 hover:text-indigo-600">Pincode vergeten ?</a>
    </div>
</div>

<style>
    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(128, 128, 128, 0.6);
        /* Dark overlay without blur */
        z-index: 10;
        /* Ensure overlay is above other content */
    }

    .overlay-off {
        z-index: 0;
    }

    #otp-container {
        z-index: 20;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('otp-form');
        const inputs = [...form.querySelectorAll('input[type=text]')];
        const submit = form.querySelector('button[type=submit]');


        const handleKeyDown = (e) => {
            if (
                !/^[0-9]{1}$/.test(e.key) &&
                e.key !== 'Backspace' &&
                e.key !== 'Delete' &&
                e.key !== 'Tab' &&
                !e.metaKey
            ) {
                e.preventDefault();
            }

            if (e.key === 'Delete' || e.key === 'Backspace') {
                const index = inputs.indexOf(e.target);
                if (e.target.value === "") {
                    if (index > 0) {
                        inputs[index - 1].value = '';
                        inputs[index - 1].focus();
                    }
                } else {
                    e.target.value = "";
                }
            }
        };

        const handleInput = (e) => {
            const {
                target
            } = e;
            const index = inputs.indexOf(target);
            if (target.value) {
                if (index < inputs.length - 1) {
                    inputs[index + 1].focus();
                } else {
                    submit.focus();
                }
            }
        };

        const handleFocus = (e) => {
            e.target.select();
            addFocusClass(); // Add focus class to all inputs
        };

        const handlePaste = (e) => {
            e.preventDefault();
            const text = e.clipboardData.getData('text');
            if (!new RegExp(`^[0-9]{${inputs.length}}$`).test(text)) {
                return;
            }
            const digits = text.split('');
            inputs.forEach((input, index) => input.value = digits[index]);
            submit.focus();
        };

        inputs.forEach((input) => {
            input.addEventListener('input', handleInput);
            input.addEventListener('keydown', handleKeyDown);
            input.addEventListener('focus', handleFocus);
            input.addEventListener('paste', handlePaste);
        });
    });
</script>
@endsection