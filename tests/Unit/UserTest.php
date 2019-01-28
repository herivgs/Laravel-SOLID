<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;

use App\Types\User;
use App\BusinessLayer\UserProcessor;
use App\Contracts\DataLayer\IUserRepository;
use App\Contracts\BusinessLayer\IUserProcessor;
use App\Exceptions\BusinessLayerException;

class UserTest extends TestCase
{
    public function testUserProcessorGetAllShouldSucceed()
    {
        // Arrange
        $mockUserRepository = \Mockery::mock(IUserRepository::class);

        // Expect
        $mockUserRepository
            ->shouldReceive('retrieveAll')
            ->with()
            ->once()
            ->andReturn([new User(), new User()]);

        // Act
        $processor = new UserProcessor($mockUserRepository);
        $user = $processor->getAll();

        // Assert
        $this->assertCount(2, $user);
        \Mockery::close();
    }

    public function testUserProcessorGetAllShouldFail()
    {
        // Arrange
        $mockUserRepository = \Mockery::mock(IUserRepository::class);

        // Expect
        $mockUserRepository
            ->shouldReceive('retrieveAll')
            ->with()
            ->once()
            ->andThrow(new BusinessLayerException(['error'], 'BusinessLayerException', 1));

        try {
            // Act
            $processor = new UserProcessor($mockUserRepository);
            $user = $processor->getAll();
        }
        catch(BusinessLayerException $e) {
            // Assert
            $this->assertInstanceOf(BusinessLayerException::class, $e);
            \Mockery::close();
        }
    }

    public function testUserProcessorCreateShouldSucceed()
    {
        // Arrange

        $mockUserRepository = \Mockery::mock(IUserRepository::class);
        $request = new Request();
        $request->replace([
            'id' => 1,
            'name' =>'Heriberto Flores',
            'password' => 'testing',
            'email' => 'hflores@grupoalcon.com'
        ]);

        // Expect
        $mockUserRepository
            ->shouldReceive('save')
            ->with(\Hamcrest\Matchers::typeOf('Object'))
            ->once()
            ->andReturn(new User());

        // Act
        $processor = new UserProcessor($mockUserRepository);
        $expect = $processor->create($request);

        // Assert
        $this->assertEquals(new User(), $expect);
        \Mockery::close();
    }

    public function testUserProcessorCreateValidateShouldFail()
    {
        // Arrange
        $mockUserRepository = \Mockery::mock(IUserRepository::class);
        $request = new Request();

        // Expect
        $mockUserRepository
            ->shouldReceive('save')
            ->with(\Hamcrest\Matchers::typeOf('Object'))
            ->never()
            ->andThrow(new BusinessLayerException(['error'], 'BusinessLayerException', 1));

        try
        {
            // Act
            $processor = new UserProcessor($mockUserRepository);
            $expect = $processor->create($request);
        }
        catch(BusinessLayerException $e)
        {
            // Assert
            $this->assertInstanceOf(BusinessLayerException::class, $e);
            \Mockery::close();
        }
    }

    public function testUserProcessorCreateShouldFail()
    {
        // Arrange
        $mockUserRepository = \Mockery::mock(IUserRepository::class);
        $request = new Request();
        $request->replace([
            'id' => 1,
            'name' =>'Heriberto Flores',
            'password' => 'testing',
            'email' => 'hflores@grupoalcon.com'
        ]);

        // Expect
        $mockUserRepository
            ->shouldReceive('save')
            ->with(\Hamcrest\Matchers::typeOf('Object'))
            ->once()
            ->andThrow(new BusinessLayerException(['error'], 'BusinessLayerException', 1));

        try
        {
            // Act
            $processor = new UserProcessor($mockUserRepository);
            $expect = $processor->create($request);
        }
        catch(BusinessLayerException $e)
        {
            // Assert
            $this->assertInstanceOf(BusinessLayerException::class, $e);
            \Mockery::close();
        }
    }
}
