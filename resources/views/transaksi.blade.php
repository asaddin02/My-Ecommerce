<div class="modal modal-lg fade" id="checkout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success" id="exampleModalLabel">Are you sure you want to buy this item?</h5>
            </div>
            <div class="modal-body text-center">
                <h6 id="grand_total_h6">Rp.{{ number_format($grand_total, '0', '.', '.') }},-</h6>
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{ route('transaksi.store') }}">
                    @csrf
                    <button type="submit" class="button btn-box-green btn-box-xs">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
