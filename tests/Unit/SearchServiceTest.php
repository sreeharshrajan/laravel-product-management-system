<?php

namespace Tests\Unit;

use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Services\SearchService;
use Illuminate\Pagination\LengthAwarePaginator;
use Mockery;
use PHPUnit\Framework\TestCase;

class SearchServiceTest extends TestCase
{
    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function test_search_calls_repository_search_when_query_is_provided()
    {
        $repository = Mockery::mock(ProductRepositoryInterface::class);
        $service = new SearchService($repository);
        $paginator = new LengthAwarePaginator([], 0, 15);

        $repository->shouldReceive('search')
            ->once()
            ->with('apple', 15)
            ->andReturn($paginator);

        $result = $service->search('apple', 15);

        $this->assertSame($paginator, $result);
    }

    public function test_search_calls_repository_get_all_when_query_is_empty()
    {
        $repository = Mockery::mock(ProductRepositoryInterface::class);
        $service = new SearchService($repository);
        $paginator = new LengthAwarePaginator([], 0, 15);

        $repository->shouldReceive('getAll')
            ->once()
            ->with(15)
            ->andReturn($paginator);

        $result = $service->search('', 15);

        $this->assertSame($paginator, $result);
    }

    public function test_search_calls_repository_get_all_when_query_is_null()
    {
        $repository = Mockery::mock(ProductRepositoryInterface::class);
        $service = new SearchService($repository);
        $paginator = new LengthAwarePaginator([], 0, 15);

        $repository->shouldReceive('getAll')
            ->once()
            ->with(15)
            ->andReturn($paginator);

        $result = $service->search(null, 15);

        $this->assertSame($paginator, $result);
    }
}
