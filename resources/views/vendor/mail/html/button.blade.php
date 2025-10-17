{{-- @props(['url', 'color' => 'primary', 'align' => 'center']) --}}
<table class="action" align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation">
    <tr>
        <td align="center">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
                <tr>
                    <td align="center">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation">
                            <tr>
                                <td>
                                    <a href="{{ $url }}" class="button" target="_blank" rel="noopener"
                                        style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; box-sizing: border-box; border-radius: 6px; color: #ffffff; display: inline-block; text-decoration: none; background-color: #111827; border-top: 12px solid #111827; border-right: 24px solid #111827; border-bottom: 12px solid #111827; border-left: 24px solid #111827;">
                                        {{ $slot }}
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
