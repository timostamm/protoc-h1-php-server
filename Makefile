protos = $(wildcard protos/*.proto)


php: $(protos)
	@find out-$@ ! -path out-$@ ! -name '.gitignore' -exec rm -rf {} +
	@protoc --proto_path=protos --$@_out=out-$@ $^
	@echo generated $@

