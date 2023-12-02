<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rhapsodie</title>
</head>

<body>
    @if (!$branchroom->isEmpty())
    @foreach ($branchroom->unique('branch_name') as $branch)
    <p>{{ $branch->branch_name }}</p>
    @foreach ($branchroom->where('branch_name', $branch->branch_name) as $room)
    <p>{{ $room->room_type }}</p>
    @endforeach
    @endforeach
    @else
    <p>"{{ $request->room }}" not found</p>
    @endif


</body>

</html>