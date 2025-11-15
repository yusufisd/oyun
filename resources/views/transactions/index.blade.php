@extends('dashboard')
@section('content')

    <h1>Transactions</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Kullanıcı</th>
                <th scope="col">Tutar</th>
                <th scope="col">Ödeme Yöntemi</th>
                <th scope="col">İşlem Türü</th>
                <th scope="col">Durum</th>
                <th scope="col">Tarih</th>
            </tr>
        </thead>
        <tbody>
            @forelse($transactions as $transaction)
                <tr>
                    <th scope="row">{{ $transaction->id }}</th>
                    <td>{{ $transaction->user?->name ?? '-' }}</td>
                    <td>{{ number_format($transaction->amount, 2) }}</td>
                    <td>{{ $transaction->payment_method }}</td>
                    <td>{{ ucfirst($transaction->type) }}</td>
                    <td>{{ ucfirst($transaction->status) }}</td>
                    <td>{{ \Carbon\Carbon::parse($transaction->datetime)->format('d.m.Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Henüz işlem bulunmuyor.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection