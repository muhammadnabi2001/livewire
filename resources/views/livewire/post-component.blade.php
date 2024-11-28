<div style="margin: 20px; font-family: Arial, sans-serif;">
    <h1 style="text-align: center; color: #4CAF50;">Posts</h1>
    <input type="text" wire:model='title' placeholder="title" class="form-control mt-3">
    <input type="text" wire:model='description' placeholder="description" class="form-control mt-3">
    <input type="submit" wire:click='add' class="btn btn-primary mt-3" value="save">

    <table style="width: 100%; border-collapse: collapse; margin-top: 20px; text-align: left;">
        <thead>
            <tr style="background-color: #f2f2f2; color: #333; border-bottom: 2px solid #4CAF50;">
                <th style="padding: 12px; border: 1px solid #ddd;">#</th>
                <th style="padding: 12px; border: 1px solid #ddd;">Title</th>
                <th style="padding: 12px; border: 1px solid #ddd;">Description</th>
                <th style="padding: 12px; border: 1px solid #ddd;">Status</th>
                <th style="padding: 12px; border: 1px solid #ddd;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $index => $post)
                <tr style="border-bottom: 1px solid #ddd;">
                    <td style="padding: 12px; border: 1px solid #ddd;">{{ $index + 1 }}</td>
                    <td style="padding: 12px; border: 1px solid #ddd;">{{ $post->title }}</td>
                    <td style="padding: 12px; border: 1px solid #ddd;">{{ $post->description }}</td>
                    <td style="padding: 12px; border: 1px solid #ddd; text-align: center;">
                        @if($post->is_active)
                            <span style="color: green; font-weight: bold;">Active</span>
                        @else
                            <span style="color: red; font-weight: bold;">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('postedit', ['id' => $post->id]) }}" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001"/>
                          </svg></a>
                        <a href="" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                          </svg></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
